import sys
#sys.path.append("/volume1/homes/Akos/.local/lib/python3.8/site-packages")
import joblib
from sklearn.ensemble import RandomForestClassifier
import numpy as np

#print(np.array(sys.argv[1:]))
currentRatios = np.array(sys.argv[1:]).reshape(1, -1)
model = joblib.load("rfModel")
result = model.predict(currentRatios)
print (result)

f = open("avgRatios.txt", "r")
avgRatios = np.array(f.read().split("\n"))

index = []
ratios = []
for i in avgRatios:
    tmp = i.split(' ')
    index.append(tmp[0])
    ratios.append(float(tmp[-1]))

tmp = currentRatios.astype(float) / ratios

response = np.zeros(50)
response[[np.where(tmp>1.1)]] = 1
response[[np.where(tmp<0.9)]] = -1

f = open("colouring.txt", "w")
for i in range(0, 50):
    f.write(index[i][:8]+"\t")
    if(response[i] == -1):
        f.write("bg-danger\n")
    if(response[i] == 0):
        f.write("bg-warning\n")
    if(response[i] == 1):
        f.write("bg-success\n")

f.close()