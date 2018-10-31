<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Realtime\Control;
use Gs2\Realtime\Model\GatheringPool;

/**
 * @author Game Server Services, Inc.
 */
class CreateGatheringPoolResult {

	/** @var GatheringPool ギャザリングプール */
	private $item;

    public function __construct(array $array)
    {
        if(isset($array['item'])) {
            $this->item = GatheringPool::build($array['item']);
        }
    }

	/**
	 * ギャザリングプールを取得
	 *
	 * @return GatheringPool ギャザリングプール
	 */
	public function getItem() {
		return $this->item;
	}

	/**
	 * ギャザリングプールを設定
	 *
	 * @param GatheringPool $item ギャザリングプール
	 */
	public function setItem($item) {
		$this->item = $item;
	}
}