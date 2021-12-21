import png 
import pyqrcode 
from pyqrcode import QRCode 
  
  
from PIL import Image
from PIL import ImageFont
from PIL import ImageDraw
import sys
import png 
import pyqrcode 
from pyqrcode import QRCode 

 
cimg = "C:/xampp/htdocs/Rendezvous/img/certificate.jpg"

out_file = "C:/xampp/htdocs/Rendezvous/img/cert/" 

text = "Fathah"
light_font = "C:/Users/User/Desktop/garden/rendezvous/2021/Chest/fonts/ProductSans-Light.ttf"
bold_font = "C:/Users/User/Desktop/garden/rendezvous/2021/Chest/fonts/ProductSans-Bold.ttf"
reg_font = "C:/Users/User/Desktop/garden/rendezvous/2021/Chest/fonts/ProductSans-Regular.ttf"



def generateCert(program, name, place):
    draw = ImageDraw.Draw(cimg)
    namefont = ImageFont.truetype(reg_font, 400)
    chestfont = ImageFont.truetype(bold_font, 500)
    idfont = ImageFont.truetype(light_font, 300)

    #Print Text
    draw.text((650, 3050),name, (255, 255, 255), font=idfont)
    draw.text((650, 3400), place, (255, 255, 255), font=chestfont)
    draw.text((650, 4750),program, (255, 255, 255), font=namefont)
    img.save(out_file+program+place+".jpg", optimize=True,quality=50)

if(__name__=="__main__"):
    generateCert('PPT Presentation', 'Saleem', 'First')