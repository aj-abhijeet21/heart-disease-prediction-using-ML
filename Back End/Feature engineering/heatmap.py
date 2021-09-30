# -*- coding: utf-8 -*-
"""
Created on Sat Jan 26 19:45:16 2019

@author: lenovo
"""
import matplotlib.pyplot as plt

import pandas as pd
import numpy as np
import seaborn as sns

data = pd.read_csv("../Datasets/data.csv")
X = data.iloc[:,0:13]  #independent columns
y = data.iloc[:,-1]    #target column
#get correlations of each features in dataset
corrmat = data.corr()
top_corr_features = corrmat.index
plt.figure(figsize=(13,13))
#plot heat map
g=sns.heatmap(data[top_corr_features].corr(),annot=True,cmap="RdYlGn")