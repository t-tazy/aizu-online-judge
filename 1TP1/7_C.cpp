#include<iostream>
using namespace std;

int main() {
  int r, c; // r行c列
  int A[100 + 1][100 + 1] = {}; // 合計行・列用に+1

  cin >> r >> c;
  for (int i = 0; i < r; i++) {
    for (int j = 0; j < c; j++) {
      cin >> A[i][j];
      A[i][c] += A[i][j]; // 行合計
      A[r][j] += A[i][j]; // 列合計
    }
  }

  for (int i = 0; i <= r; i++) {
    for (int j = 0; j <= c; j++) {
      cout << A[i][j];
      if (j != c) cout << ' ';
      if (i == r && j != c) A[r][c] += A[r][j];
    }
    cout << endl;
  }

  return 0;
}
