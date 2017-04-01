package testjava;

public class Josephus {

	// 目前的土豆在的位置
	static int current = 0;
	// 每次圈轮的个数
	static int circle = 5;
	static int[] queue = new int[90];
	static {
		for (int i = 0; i < queue.length; i++) {
			queue[i] = 1;
		}
	}

	// 计算已经退出的人的位置
	public static int pop(int currentIdx) {
		int next = currentIdx;
		for (int i = 0; i < circle; i++) {
			// 循环
//			System.out.println("循环 ++" + next);
			if ((next + 1) > (queue.length - 1)) {
				next = 0;
			} else {
				next++;
			}
			int ii = 0;
			while ((queue[next] == 0) && (ii < (queue.length - 1)) ) {
				
				if ((next + 1) > (queue.length - 1)) {
					next = 0;
				}
				ii++;
				next++;
//				System.out.println("while ++" + ii);
			}
			if (ii == queue.length - 1) {
				System.out.println("最后的人是：" + ii);
//				System.out.println(queue.length);
				for (int ib = 0; ib < queue.length; ib++) {
//					System.out.println(queue[ib]);
				}
				return 101;
			}
		}
		return next;
	}

	public static void start(int start) {

		while (pop(start) != 101) {
			start = pop(start);
			queue[start] = 0;
			System.out.println("出去！---》"+start);
		}
	}

	public static void main(String[] args) {
		start(5);
	}

}
