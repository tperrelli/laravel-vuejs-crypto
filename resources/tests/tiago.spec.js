/**
 * @vitest-environment happy-dom
 */
import { beforeEach, afterEach, describe, expect, it, vi } from 'vitest';
import httpRequest from '../js/Services/Http';
import { mount } from '@vue/test-utils';
import CoinMain from '../js/components/CoinMain.vue';
import { useRouter } from 'vue-router';

vi.mock('vue-router');

describe('CoinMain tests', () => {

  afterEach(() => {
    vi.restoreAllMocks();
  });

  beforeEach(() => {
    useRouter().push.mockReset()
  })

  useRouter.mockReturnValue({
    push: vi.fn(),
  })

  it('should render', async () => {

    vi.spyOn(httpRequest, 'get').mockImplementation(() => {
      return Promise.resolve({
        data: {
          data: []
        }
      })
    });

    const wrapper = mount(CoinMain);

    expect(wrapper.find('table').exists()).toBe(true);
    expect(wrapper.exists()).toBeTruthy();
  });
});