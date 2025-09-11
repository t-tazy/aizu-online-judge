#include<iostream>
using namespace std;

int main() {
  int n, m, l; // n行m列とm行l列
  int A[100][100] = {};
  int B[100][100] = {};
  long long C[100][100] = {}; // 求める行列Cはn行l列

  cin >> n >> m >> l;

  for (int i = 0; i < n; i++) {
    for (int j = 0; j < m; j++) {
      cin >> A[i][j];
    }
  }

  for (int i = 0; i < m; i++) {
    for (int j = 0; j < l; j++) {
      cin >> B[i][j];
    }
  }

  for (int i = 0; i < n; i++) {
    for (int j = 0; j < l; j++) {
      for (int k = 0; k < m; k++) {
        C[i][j] += A[i][k] * B[k][j];
      }
    }
  }

  for (int i = 0; i < n; i++) {
    for (int j = 0; j < l; j++) {
      cout << C[i][j];
      if (j != l - 1) cout << ' ';
    }
    cout << endl;
  }

  return 0;
}
