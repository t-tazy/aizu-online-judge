#include<iostream>
using namespace std;

int main() {
  // 長方形の右上座標(W, H)
  // 円の中心座標(x, y)
  // 円の半径r
  int W, H, x, y, r;
  bool xInRect, yInRect;

  cin >> W >> H >> x >> y >> r;

  xInRect = x - r >= 0 && x + r <= W;
  yInRect = y - r >= 0 && y + r <= H;

  if (xInRect && yInRect) cout << "Yes";
  else cout << "No";

  cout << endl;

  return 0;
}
