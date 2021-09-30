# -*- coding: utf-8 -*-
"""
Created on Sat Jan 26 23:37:07 2019

@author: lenovo
"""
import matplotlib.pyplot as plt
import sklearn
import pandas as pd
df = pd.read_csv("../Datasets/data.csv")
# print(list(df))
y = df.pop('num').values
z = df.pop('ca').values
# Our data
#labels = ["0", "1", "2", "3"]
usage = [y]

# Generating the y positions. Later, we'll use them to replace them with labels.
#y_positions = range(len(labels))

# Creating our bar plot
#plt.bar(z, y)
#plt.xticks(y, labels)
#plt.ylabel("Usage (%)")
#plt.title("Programming language usage")
#plt.show()
fig_size = plt.rcParams["figure.figsize"]
fig_size[0] = 10
fig_size[1] = 10
plt.rcParams["figure.figsize"] = fig_size
from pandas.plotting import scatter_matrix
scatter_matrix(df)
plt.show()