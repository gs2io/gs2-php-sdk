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
use Gs2\Inbox\Model\Message;

/**
 * @author Game Server Services, Inc.
 */
class ReadMessagesResult {

	/** @var Message[] メッセージ */
	private $items;

	/** @var string 開封通知のレスポンス内容 */
	private $cooperationResponse;

    public function __construct(array $array)
    {
        if(isset($array['items'])) {
            $this->items = [];
            foreach($array['items'] as $arr)
            {
                array_push($this->items, Message::build($arr));
            }
        }
        if(isset($array['cooperationResponse'])) {
            $this->cooperationResponse = $array['cooperationResponse'];
        }
    }

	/**
	 * メッセージを取得
	 *
	 * @return Message[] メッセージ
	 */
	public function getItems() {
		return $this->items;
	}

	/**
	 * メッセージを設定
	 *
	 * @param Message[] $items メッセージ
	 */
	public function setItems($items) {
		$this->items = $items;
	}

	/**
	 * 開封通知のレスポンス内容を取得
	 *
	 * @return string 開封通知のレスポンス内容
	 */
	public function getCooperationResponse() {
		return $this->cooperationResponse;
	}

	/**
	 * 開封通知のレスポンス内容を設定
	 *
	 * @param string $cooperationResponse 開封通知のレスポンス内容
	 */
	public function setCooperationResponse($cooperationResponse) {
		$this->cooperationResponse = $cooperationResponse;
	}
}