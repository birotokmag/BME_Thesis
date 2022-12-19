import pandas as pd
import numpy as np
import sys
import warnings
warnings.filterwarnings("ignore")

df = pd.read_pickle("dataframe")
yearsString = ["14", "15", "16", "17", "18", "19", "20"]
arbevetel = ["TAH197"]
koltseg = ["TAC008",
"TAC009","TAC011","TAC010","TAC078","TAH014","TAH015","TAC012","TAC013","TAC014","TAC015","TAC016","TAC018","TAC063","TAH021","TAC109","TAC190","TAC059","TAB024","TAH197"]
merlegfoosszeg=["TAH186",
"TAH230","TAH033","TAH087","TAH088","TAH041","TAH042","TAH231","TAH043","TAH044","TAH232","TAH045", "TAH187", "TAI001",
"TAI002","TAI019","TAI020","TAI022","TAI023","TAI041","TAI042","TAI043","TAI044","TAI033","TAH034","TAI045","TAI046","TAI035","TAI047","TAI048","TAI036","TAI049","TAI050","TAI037","TAI051","TAI052","TAI053","TAI054","TAI055","TAI056","TAI057","TAH190","TAI038","TAI058", "TAB024","TAH197"]
liabilities = ["TAH209","TAH051","TAH227","TAH054","TAH055","TAH180","TAH199"]
toke = ["TAH002","TAH003","TAH004","TAH005","TAH011","TAH007","TAH233","TAH234","TAH012","TAH048","TAH189","TAH208","TAH060","TAH179","TAH187"]

ratios = pd.DataFrame()
for y in yearsString:
    for i in arbevetel:
        ratios[y+i+"arbev"] = df[y+i]/df[y+"TAC002"]
    for i in merlegfoosszeg:
        ratios[y+i+"mf"] = df[y+i]/df[y+"TAH061"]
    for i in liabilities:
        ratios[y+i+"liab"] = df[y+i]/(df[y+"TAH051"]+df[y+"TAH054"])
    for i in toke:
        ratios[y+i+"toke"] = df[y+i]/(df[y+"TAH001"]+df[y+"TAH012"]+df[y+"TAH048"]+df[y+"TAH189"]+df[y+"TAH208"]+df[y+"TAH060"]+df[y+"TAH179"]+df[y+"TAH187"]+df[y+"TAH059"])
    for i in koltseg:
        ratios[y+i+"kolt"] = df[y+i]/(df[y+"TAC002"]+df[y+"TAC006"]-df[y+"TAC019"])
ratios = ratios.replace(np.inf, 0)
ratios = ratios.replace(-np.inf, 0)
ratios.fillna(0, inplace=True)

ratiosMask = np.load("ratiosRFEmask.npy")
ratiosCluster = ratios[ratios.columns[ratiosMask]]

need = df[ratiosCluster.columns.astype(str).str[0:8]]
for y in yearsString:
    need[y+"mf"] = df[y+"TAH061"]
    need[y+"liab"] = (df[y+"TAH051"]+df[y+"TAH054"])
    need[y+"toke"] = (df[y+"TAH001"]+df[y+"TAH012"]+df[y+"TAH048"]+df[y+"TAH189"]+df[y+"TAH208"]+df[y+"TAH060"]+df[y+"TAH179"]+df[y+"TAH187"]+df[y+"TAH059"])
    need[y+"kolt"] = (df[y+"TAC002"]+df[y+"TAC006"]-df[y+"TAC019"])

res = "\n".join("{} {}".format(x, y) for x, y in zip(list(need.columns), need.loc[int(sys.argv[1])].values))

f = open("companyData.txt", "w")
f.write(res)
f.close()