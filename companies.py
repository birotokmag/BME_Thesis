import pandas as pd
import numpy as np

df = pd.read_pickle("dataframe")

np.set_printoptions(suppress = True)
print(df.index.values)