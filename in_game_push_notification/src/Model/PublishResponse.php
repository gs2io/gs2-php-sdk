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

namespace Gs2\InGamePushNotification\Model;

/**
 * 通知結果
 *
 * @author Game Server Services, Inc.
 *
 */
class PublishResponse {

	/** @var string 通知に使用した方式 */
	private $type;

	/** @var string 件名 */
	private $subject;

	/** @var string 本文 */
	private $body;

	/**
	 * 通知に使用した方式を取得
	 *
	 * @return string 通知に使用した方式
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * 通知に使用した方式を設定
	 *
	 * @param string $type 通知に使用した方式
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * 通知に使用した方式を設定
	 *
	 * @param string $type 通知に使用した方式
	 * @return self
	 */
	public function withType($type): self {
		$this->setType($type);
		return $this;
	}

	/**
	 * 件名を取得
	 *
	 * @return string 件名
	 */
	public function getSubject() {
		return $this->subject;
	}

	/**
	 * 件名を設定
	 *
	 * @param string $subject 件名
	 */
	public function setSubject($subject) {
		$this->subject = $subject;
	}

	/**
	 * 件名を設定
	 *
	 * @param string $subject 件名
	 * @return self
	 */
	public function withSubject($subject): self {
		$this->setSubject($subject);
		return $this;
	}

	/**
	 * 本文を取得
	 *
	 * @return string 本文
	 */
	public function getBody() {
		return $this->body;
	}

	/**
	 * 本文を設定
	 *
	 * @param string $body 本文
	 */
	public function setBody($body) {
		$this->body = $body;
	}

	/**
	 * 本文を設定
	 *
	 * @param string $body 本文
	 * @return self
	 */
	public function withBody($body): self {
		$this->setBody($body);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return PublishResponse
	 */
    static function build(array $array)
    {
        $item = new PublishResponse();
        $item->setType(isset($array['type']) ? $array['type'] : null);
        $item->setSubject(isset($array['subject']) ? $array['subject'] : null);
        $item->setBody(isset($array['body']) ? $array['body'] : null);
        return $item;
    }

}