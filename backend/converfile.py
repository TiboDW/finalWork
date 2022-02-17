
import json
import requests
import checkPlag
import sys
from pdfminer3.layout import LAParams, LTTextBox
from pdfminer3.pdfpage import PDFPage
from pdfminer3.pdfinterp import PDFResourceManager
from pdfminer3.pdfinterp import PDFPageInterpreter
from pdfminer3.converter import PDFPageAggregator
from pdfminer3.converter import TextConverter
import io



#filename extracten en pdf in text converten
#url moet variable worden
#urlPdf = '/Users/tibodewinter/Documents/finalwork/frond-end/public/uploads/71.pdf'
urlPdf = sys.argv[1]
print(urlPdf)

#----------------------------------------------------------------   ----------------------------------------------------------------
resource_manager = PDFResourceManager()
fake_file_handle = io.StringIO()
converter = TextConverter(resource_manager, fake_file_handle, laparams=LAParams())
page_interpreter = PDFPageInterpreter(resource_manager, converter)

with open(urlPdf, 'rb') as fh:

    for page in PDFPage.get_pages(fh,
                                  caching=True,
                                  check_extractable=True):
        page_interpreter.process_page(page)

    textExtract = fake_file_handle.getvalue()

# close open handles
converter.close()
fake_file_handle.close()

print(textExtract)
#----------------------------------------------------------------   ----------------------------------------------------------------


#textExtract = extract_text(urlPdf)
#print(textExtract) 
filename = urlPdf.split("/")
filename = filename[-1]
filename = filename[:-4]
print("++++")
print(filename)
print("++++")

description = "This is a description"
filenamefull = filename + ".pdf"



#lengte van file controleren en plag chech uitvoeren
if len(textExtract) < 5000:
    print(textExtract)
    checkPlag.plagcheck(textExtract, filename)
    checkPlag.sendDetailToDB(filename)
    pathjson = "/Users/tibodewinter/Documents/finalwork/backend/json/" + filename + ".json"
    with open(pathjson) as file:
        data = json.load(file)
    print(data['uniquePercent'])
    if(data['plagPercent'] < 50):
        print("plag is onder 50")
        checkPlag.sendToBlockchain(urlPdf, filename, description, filenamefull) 




#later op terug komen
#split text in stukken van 5000 woorden
else:
    #split file into multiple string of 5000 words
    lijsttext = [textExtract]

    for x in range(len(lijsttext)):
        grotetext = lijsttext[x]
        if len(grotetext) > 5000:
           lijsttext.append(lijsttext[x][:len(lijsttext[x])//2])
           lijsttext.append(lijsttext[x][len(lijsttext[x])//2:])
           lijsttext.pop(x)

    for x in range(len(lijsttext)):
        print('=================')
        print(len(lijsttext[x]))
        print(lijsttext[x])
       
    



