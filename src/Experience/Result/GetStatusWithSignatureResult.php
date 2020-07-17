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

namespace Gs2\Experience\Result;

use Gs2\Core\Model\IResult;
use Gs2\Experience\Model\Status;

/**
 * ステータスを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetStatusWithSignatureResult implements IResult {
	/** @var Status ステータス */
	private $item;
	/** @var string 検証対象のオブジェクト */
	private $body;
	/** @var string 署名 */
	private $signature;

	/**
	 * ステータスを取得
	 *
	 * @return Status|null ステータスを取得
	 */
	public function getItem(): ?Status {
		return $this->item;
	}

	/**
	 * ステータスを設定
	 *
	 * @param Status|null $item ステータスを取得
	 */
	public function setItem(?Status $item) {
		$this->item = $item;
	}

	/**
	 * 検証対象のオブジェクトを取得
	 *
	 * @return string|null ステータスを取得
	 */
	public function getBody(): ?string {
		return $this->body;
	}

	/**
	 * 検証対象のオブジェクトを設定
	 *
	 * @param string|null $body ステータスを取得
	 */
	public function setBody(?string $body) {
		$this->body = $body;
	}

	/**
	 * 署名を取得
	 *
	 * @return string|null ステータスを取得
	 */
	public function getSignature(): ?string {
		return $this->signature;
	}

	/**
	 * 署名を設定
	 *
	 * @param string|null $signature ステータスを取得
	 */
	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}

    public static function fromJson(array $data): GetStatusWithSignatureResult {
        $result = new GetStatusWithSignatureResult();
        $result->setItem(isset($data["item"]) ? Status::fromJson($data["item"]) : null);
        $result->setBody(isset($data["body"]) ? $data["body"] : null);
        $result->setSignature(isset($data["signature"]) ? $data["signature"] : null);
        return $result;
    }
}