# -*- coding: utf-8 -*-
"""
Created on Thu Feb 28 13:46:22 2019

@author: lenovo
"""

import pandas as pd
from sklearn.feature_selection import RFE
from sklearn.linear_model import LogisticRegression
df = pd.read_csv("Datasets/newheart.csv")
array = df.values
x = array[:, 0:13]
y = array[:,13]
model = LogisticRegression()
rfe = RFE(model, 3)
fit = rfe.fit(x,y)
print("Num features : %d") %fit.n_features_
print("Selected dfeatures : %s") %fit.support_
print("Features Ranking : %d") %fit.ranking_