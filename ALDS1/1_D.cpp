#include<iostream>
#include<algorithm>
using namespace std;
static const int MAX = 200000; // nの最大値

// 解答例見てやってみる
int main() {
  // 関数名のmax,minと衝突しないようにmaxv,minvとする
  int n, R[MAX];

  cin >> n;
  for (int i = 0; i < n; i++) cin >> R[i];

  int maxv = -2000000000; // -10^9以下ならOK
  int minv = R[0];

  for (int i = 1; i < n; i++) {
    maxv = max(maxv, R[i] - minv);
    minv = min(minv, R[i]);
  }

  cout << maxv << endl;

  return 0;
}
