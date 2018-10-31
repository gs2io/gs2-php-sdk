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

namespace Gs2\Notification\Control;
use Gs2\Notification\Model\Notification;

/**
 * @author Game Server Services, Inc.
 */
class UpdateNotificationResult {

	/** @var Notification 通知 */
	private $item;

    public function __construct(array $array)
    {
        if(isset($array['item'])) {
            $this->item = Notification::build($array['item']);
        }
    }

	/**
	 * 通知を取得
	 *
	 * @return Notification 通知
	 */
	public function getItem() {
		return $this->item;
	}

	/**
	 * 通知を設定
	 *
	 * @param Notification $item 通知
	 */
	public function setItem($item) {
		$this->item = $item;
	}
}