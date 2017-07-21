/**
 * @author Dave Ligthart <info@daveligthart.com>
 */

function Page(){}

/**
 * converts hexadecimal numbers to decimal equivalent
 */
Page.prototype.hex2dec = function(input){
  hex = input.toLowerCase();
  if(hex.length != 2){
    return "Not a valid hexcode! Use only two of the symbols 0-9,a-f"
  }
  hex1 = hex.charAt(0);
  hex2 = hex.charAt(1);
  if(hex1 <= 9){
    hex1=hex1;
  }
  else{
    hex1.toLowerCase()
    if(hex1 == "a") { hex1 = 10; }
    if(hex1 == "b") { hex1 = 11; }
    if(hex1 == "c") { hex1 = 12; }
    if(hex1 == "d") { hex1 = 13; }
    if(hex1 == "e") { hex1 = 14; }
    if(hex1 == "f") { hex1 = 15; }
  }
  if(hex2 <= 9){
    hex2=hex2;
  }
  else{
    hex2.toLowerCase()
    if(hex2 == "a") { hex2 = 10; }
    if(hex2 == "b") { hex2 = 11; }
    if(hex2 == "c") { hex2 = 12; }
    if(hex2 == "d") { hex2 = 13; }
    if(hex2 == "e") { hex2 = 14; }
    if(hex2 == "f") { hex2 = 15; }
  }
  ret1 = parseInt(hex1*16);
  ret2 = parseInt(hex2);
  retTot = parseInt(ret1+ret2);
  return retTot
}
/**
 * Converts hexadecimalcolor numbers to decimal equivalent
 */
Page.prototype.color2Dec = function(color){
  var h1 = null;
  var h2 = null;
  var ncolor = "";
  for(i=0;i<color.length;i++){
    if(color[i] != "#") {
      if(h1 == null){
         h1 = color[i];
      }
      else if(h2 == null){
         h2 = color[i];
      }
      if(h1!=null && h2!=null){
        ncolor+= this.hex2dec(h1+h2);
        h1 = null;
        h2 = null;
      }
    }
  }
  var nonzero = null;
  var ndec = "";
  for(i=0;i<dec.length;i++){
    if(dec[i] > 0){
      nonzero = i;
    }
    if(nonzero!=null){
      ndec += dec[i];
    }
  }
  return ncolor;
}

Page.prototype.containsLightColor = function(color){
  if((red > 99 || isNaN(red))
     || (blue > 99 || isNaN(blue))
     || (green > 99 || isNaN(green))) {
     return true;
  }
  return false;
}

/**
 * Check for dark contrast
 */
Page.prototype.checkForDark = function(color){
  var brightness = this.get_brightness(color);
  if(brightness < 130) return true;
  return false;
}

/**
 * Returns brightness value from 0 to 255
 */
Page.prototype.get_brightness = function(hexcolor) {
   var hex = new String(hexcolor);
   hex = hex.replace(/#/g,"");
   var c_r = this.hex2dec(hex.substr(0, 2));
   var c_g = this.hex2dec(hex.substr(2, 2));
   var c_b  = this.hex2dec(hex.substr(4, 2));
   return ((c_r * 299) + (c_g * 587) + (c_b * 114)) / 1000;
}
