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

namespace Gs2\Dictionary\Result;

use Gs2\Core\Model\IResult;
use Gs2\Dictionary\Model\Entry;

/**
 * エントリーを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetEntryWithSignatureResult implements IResult {
	/** @var Entry エントリー */
	private $item;
	/** @var string 署名対象のエントリー情報 */
	private $body;
	/** @var string 署名 */
	private $signature;

	/**
	 * エントリーを取得
	 *
	 * @return Entry|null エントリーを取得
	 */
	public function getItem(): ?Entry {
		return $this->item;
	}

	/**
	 * エントリーを設定
	 *
	 * @param Entry|null $item エントリーを取得
	 */
	public function setItem(?Entry $item) {
		$this->item = $item;
	}

	/**
	 * 署名対象のエントリー情報を取得
	 *
	 * @return string|null エントリーを取得
	 */
	public function getBody(): ?string {
		return $this->body;
	}

	/**
	 * 署名対象のエントリー情報を設定
	 *
	 * @param string|null $body エントリーを取得
	 */
	public function setBody(?string $body) {
		$this->body = $body;
	}

	/**
	 * 署名を取得
	 *
	 * @return string|null エントリーを取得
	 */
	public function getSignature(): ?string {
		return $this->signature;
	}

	/**
	 * 署名を設定
	 *
	 * @param string|null $signature エントリーを取得
	 */
	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}

    public static function fromJson(array $data): GetEntryWithSignatureResult {
        $result = new GetEntryWithSignatureResult();
        $result->setItem(isset($data["item"]) ? Entry::fromJson($data["item"]) : null);
        $result->setBody(isset($data["body"]) ? $data["body"] : null);
        $result->setSignature(isset($data["signature"]) ? $data["signature"] : null);
        return $result;
    }
}