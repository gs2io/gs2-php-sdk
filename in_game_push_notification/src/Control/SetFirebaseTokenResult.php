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

namespace Gs2\InGamePushNotification\Control;
use Gs2\InGamePushNotification\Model\FirebaseToken;

/**
 * @author Game Server Services, Inc.
 */
class SetFirebaseTokenResult {

	/** @var FirebaseToken Firebase 通知トークン */
	private $item;

    public function __construct(array $array)
    {
        if(isset($array['item'])) {
            $this->item = FirebaseToken::build($array['item']);
        }
    }

	/**
	 * Firebase 通知トークンを取得
	 *
	 * @return FirebaseToken Firebase 通知トークン
	 */
	public function getItem() {
		return $this->item;
	}

	/**
	 * Firebase 通知トークンを設定
	 *
	 * @param FirebaseToken $item Firebase 通知トークン
	 */
	public function setItem($item) {
		$this->item = $item;
	}
}