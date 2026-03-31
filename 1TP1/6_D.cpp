#include<iostream>
using namespace std;

int main() {
  int n, m; // n行m列
  int A[100][100] = {}; // 行列
  int b[100] = {}; // 列ベクトル
  long long c[100] = {};
  
  cin >> n >> m;

  // NOTE: 可変長引数はC++では未定義
  // vectorを使う方法があるっぽい
  // int A[n][m] = {}; // 行列
  // int b[m] = {}; // 列ベクトル
  // long long c[n] = {};

  for (int i = 0; i < n; i++) {
    for (int j = 0; j < m; j++) {
      cin >> A[i][j];
    }
  }

  for (int i = 0; i < m; i++) {
    cin >> b[i];
  }

  // cの各要素はa x b x m
  // 10^4 x 10^4 x 10^2 = 10^10
  // long long型にしないと？

  for (int i = 0; i < n; i++) {
    for (int j = 0; j < m; j++) {
      c[i] += A[i][j] * b[j];
    }

    cout << c[i] << endl;
  }

  return 0;
}
