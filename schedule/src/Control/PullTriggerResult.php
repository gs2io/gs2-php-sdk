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

namespace Gs2\Schedule\Control;
use Gs2\Schedule\Model\Trigger;

/**
 * @author Game Server Services, Inc.
 */
class PullTriggerResult {

	/** @var Trigger トリガー */
	private $item;

    public function __construct(array $array)
    {
        if(isset($array['item'])) {
            $this->item = Trigger::build($array['item']);
        }
    }

	/**
	 * トリガーを取得
	 *
	 * @return Trigger トリガー
	 */
	public function getItem() {
		return $this->item;
	}

	/**
	 * トリガーを設定
	 *
	 * @param Trigger $item トリガー
	 */
	public function setItem($item) {
		$this->item = $item;
	}
}