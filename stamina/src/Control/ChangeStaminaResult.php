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

namespace Gs2\Stamina\Control;
use Gs2\Stamina\Model\Stamina;

/**
 * @author Game Server Services, Inc.
 */
class ChangeStaminaResult {

	/** @var Stamina スタミナ */
	private $item;

	/** @var int 次にスタミナが回復する時間 */
	private $nextIncreaseTimestamp;

    public function __construct(array $array)
    {
        if(isset($array['item'])) {
            $this->item = Stamina::build($array['item']);
        }
        if(isset($array['nextIncreaseTimestamp'])) {
            $this->nextIncreaseTimestamp = $array['nextIncreaseTimestamp'];
        }
    }

	/**
	 * スタミナを取得
	 *
	 * @return Stamina スタミナ
	 */
	public function getItem() {
		return $this->item;
	}

	/**
	 * スタミナを設定
	 *
	 * @param Stamina $item スタミナ
	 */
	public function setItem($item) {
		$this->item = $item;
	}

	/**
	 * 次にスタミナが回復する時間を取得
	 *
	 * @return int 次にスタミナが回復する時間
	 */
	public function getNextIncreaseTimestamp() {
		return $this->nextIncreaseTimestamp;
	}

	/**
	 * 次にスタミナが回復する時間を設定
	 *
	 * @param int $nextIncreaseTimestamp 次にスタミナが回復する時間
	 */
	public function setNextIncreaseTimestamp($nextIncreaseTimestamp) {
		$this->nextIncreaseTimestamp = $nextIncreaseTimestamp;
	}
}