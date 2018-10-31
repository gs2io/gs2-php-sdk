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

namespace Gs2\Inbox\Control;

/**
 * @author Game Server Services, Inc.
 */
class DescribeServiceClassResult {

	/** @var string[] サービスクラス一覧 */
	private $items;

    public function __construct(array $array)
    {
        if(isset($array['items'])) {
            $this->items = $array['items'];
        }
    }

	/**
	 * サービスクラス一覧を取得
	 *
	 * @return string[] サービスクラス一覧
	 */
	public function getItems() {
		return $this->items;
	}

	/**
	 * サービスクラス一覧を設定
	 *
	 * @param string[] $items サービスクラス一覧
	 */
	public function setItems($items) {
		$this->items = $items;
	}
}