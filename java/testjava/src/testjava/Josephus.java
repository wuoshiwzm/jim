package testjava;

public class Josephus {

	// Ŀǰ�������ڵ�λ��
	static int current = 0;
	// ÿ��Ȧ�ֵĸ���
	static int circle = 5;
	static int[] queue = new int[90];
	static {
		for (int i = 0; i < queue.length; i++) {
			queue[i] = 1;
		}
	}

	// �����Ѿ��˳����˵�λ��
	public static int pop(int currentIdx) {
		int next = currentIdx;
		for (int i = 0; i < circle; i++) {
			// ѭ��
//			System.out.println("ѭ�� ++" + next);
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
				System.out.println("�������ǣ�" + ii);
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
			System.out.println("��ȥ��---��"+start);
		}
	}

	public static void main(String[] args) {
		start(5);
	}

}