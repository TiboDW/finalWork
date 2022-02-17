import requests


data =  {
    'key': 'cbea4c2aa80955039c8071fa3d015566'
}
r = requests.post('https://www.prepostseo.com/apis', data=data)
print(r.json())