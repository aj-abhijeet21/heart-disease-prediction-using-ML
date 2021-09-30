# -*- coding: utf-8 -*-
"""
Created on Mon Feb 25 15:12:58 2019

@author: lenovo
"""

import pandas as pd
import numpy as np

file1 = "Datasets/final.csv"
df = pd.read_csv(file1, sep= ',')
#csv_header = 'Age,Sex,chesp pain type,resting bp,cholestrol,fasting blood sugar,electrocardiographic ,max heart rate,exercise induced angina,oldpeak,slope of peak exercise,ca,thal,num'
df = df.replace(to_replace = -9 , value = np.nan)
df = df.replace(-9.1, np.NaN)
df = df.replace('-9.0', np.NaN)
df = df.replace('?', np.NaN)
#df.interpolate(method = 'linear', axis=0).ffill().bfill()
#df.fillna(df.mean(), inplace = True)
with open("Datasets/withnan.csv", 'w', encoding='utf-8') as f:
    df.to_csv(f, index=False)

file1 = "Datasets/withnan.csv"
df = pd.read_csv(file1, sep= ',')
x = df.isnull().sum().sort_values(ascending = False).head()
y = df.pop('num').values
print(y)
print (x)

from sklearn import preprocessing
from sklearn.preprocessing import Imputer
imp = Imputer(missing_values = 'NaN', strategy= 'mean', axis =0)
imp.fit(df)
df = pd.DataFrame(data = imp.transform(df), columns= df.columns)
x = df.isnull().sum().sort_values(ascending = False).head()
#print(df)

min_max_scaler = preprocessing.MinMaxScaler()
df1 = min_max_scaler.fit_transform(df)
df1 = pd.DataFrame(data =df1, columns= df.columns)

df2 = pd.DataFrame({'num': y[:]})
df1 = df1.join(df2)
df1 = df1.fillna(method='ffill')
print(df1.isnull().any())
pd.DataFrame(df1).to_csv("Datasets/file.csv", index = None)
#with open("Datasets/scaled.csv", 'w', encoding='utf-8') as f:
#    df1.to_csv(f, index=False)




