import pandas as pd
import numpy as np

data = pd.read_csv("../Datasets/data.csv")
data1 = pd.read_csv("../Datasets/heart.csv")
X = data.iloc[:,0:13]  #independent columns
y = data.iloc[:,-1]    #target column i.e price range
data.columns = data1.columns
print(data.dtypes)
print(data.columns)
cols = data.columns
#data[cols] = data[cols].apply(pd.to_numeric, errors='coerce')
#data['num'] = data['num'].astype(int)
data = data.dropna(axis=0, thresh= 3)
data.interpolate(method = 'linear', axis=0).ffill().bfill()
data.fillna(data.mean(), inplace = True)
x = data.isnull().sum().sort_values(ascending = False).head()

print(x)

from sklearn.ensemble import ExtraTreesClassifier
import matplotlib.pyplot as plt
model = ExtraTreesClassifier()
model.fit(X,y)
print(model.feature_importances_) #use inbuilt class feature_importances of tree based classifiers
#plot graph of feature importances for better visualization
feat_importances = pd.Series(model.feature_importances_, index=X.columns)
feat_importances.nlargest(10).plot(kind='barh')
plt.show()
