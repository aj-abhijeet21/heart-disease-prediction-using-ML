# -*- coding: utf-8 -*-
"""
Created on Mon Feb 25 21:53:31 2019

@author: lenovo
"""

import pandas as pd
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
