# -*- coding: utf-8 -*-
"""
Created on Mon Feb 25 14:44:47 2019

@author: lenovo
"""

import pandas as pd
file1 = "Datasets/ds1.csv"
file2 = "Datasets/ds2.csv"
file3 = "Datasets/ds3.csv"
file4 = "Datasets/ds4.csv"
df1 = pd.read_csv(file1, sep= ',', header= None)
df2 = pd.read_csv(file2, sep= ',', header= None)
df3 = pd.read_csv(file3, sep= ',', header= None)
df4 = pd.read_csv(file4, sep= ',', header= None)

out = df1.append(df2)
out = out.append(df3)
out = out.append(df4)
out.columns = ['Age','Sex','chesp pain type','resting bp','cholestrol','fasting blood sugar','electrocardiographic' ,'max heart rate','exercise induced angina','oldpeak','slope of peak exercise','ca','thal','num']
#print(out)

with open("Datasets/final.csv", 'w', encoding='utf-8') as f:
    out.to_csv(f, index=False)
	
df = pd.read_csv("Datasets/final.csv", sep= ',', header= None)
print(df)