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

namespace Gs2\ConsumableItem\Control;
use Gs2\ConsumableItem\Model\ItemPool;

/**
 * @author Game Server Services, Inc.
 */
class CreateItemPoolResult {

	/** @var ItemPool 消費型アイテムプール */
	private $item;

    public function __construct(array $array)
    {
        if(isset($array['item'])) {
            $this->item = ItemPool::build($array['item']);
        }
    }

	/**
	 * 消費型アイテムプールを取得
	 *
	 * @return ItemPool 消費型アイテムプール
	 */
	public function getItem() {
		return $this->item;
	}

	/**
	 * 消費型アイテムプールを設定
	 *
	 * @param ItemPool $item 消費型アイテムプール
	 */
	public function setItem($item) {
		$this->item = $item;
	}
}