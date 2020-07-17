<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Version\Result;

use Gs2\Core\Model\IResult;

/**
 * スタンプシートのタスクを実行する のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class CalculateSignatureResult implements IResult {
	/** @var string ボディ */
	private $body;
	/** @var string 署名 */
	private $signature;

	/**
	 * ボディを取得
	 *
	 * @return string|null スタンプシートのタスクを実行する
	 */
	public function getBody(): ?string {
		return $this->body;
	}

	/**
	 * ボディを設定
	 *
	 * @param string|null $body スタンプシートのタスクを実行する
	 */
	public function setBody(?string $body) {
		$this->body = $body;
	}

	/**
	 * 署名を取得
	 *
	 * @return string|null スタンプシートのタスクを実行する
	 */
	public function getSignature(): ?string {
		return $this->signature;
	}

	/**
	 * 署名を設定
	 *
	 * @param string|null $signature スタンプシートのタスクを実行する
	 */
	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}

    public static function fromJson(array $data): CalculateSignatureResult {
        $result = new CalculateSignatureResult();
        $result->setBody(isset($data["body"]) ? $data["body"] : null);
        $result->setSignature(isset($data["signature"]) ? $data["signature"] : null);
        return $result;
    }
}