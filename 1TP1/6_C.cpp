#include<iostream>
using namespace std;

int main() {
  int n, b, f, r, v; // b棟f階r番目の部屋にv人入居（vが負の値の場合退去）
  int building[5][4][11];

  for (int i = 1; i < 5; i++) {
    for (int j = 1; j < 4; j++) {
      for (int k = 1; k < 11; k++) {
        building[i][j][k] = 0;
      }
    }
  }

  cin >> n;
  for (int i = 0; i < n; i++) {
    cin >> b >> f >> r >> v;
    building[b][f][r] += v;
  }

  for (int i = 1; i < 5; i++) {
    for (int j = 1; j < 4; j++) {
      for (int k = 1; k < 11; k++) {
        cout << ' ' << building[i][j][k];
        if (k == 10) cout << endl;
      }
    }
    if (i != 4) cout << "####################" << endl;
  }

  return 0;
}
