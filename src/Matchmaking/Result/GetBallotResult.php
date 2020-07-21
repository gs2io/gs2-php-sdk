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

namespace Gs2\Matchmaking\Result;

use Gs2\Core\Model\IResult;
use Gs2\Matchmaking\Model\Ballot;

/**
 * 投票用紙を取得します。 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetBallotResult implements IResult {
	/** @var Ballot 投票用紙 */
	private $item;
	/** @var string 署名対象のデータ */
	private $body;
	/** @var string 署名データ */
	private $signature;

	/**
	 * 投票用紙を取得
	 *
	 * @return Ballot|null 投票用紙を取得します。
	 */
	public function getItem(): ?Ballot {
		return $this->item;
	}

	/**
	 * 投票用紙を設定
	 *
	 * @param Ballot|null $item 投票用紙を取得します。
	 */
	public function setItem(?Ballot $item) {
		$this->item = $item;
	}

	/**
	 * 署名対象のデータを取得
	 *
	 * @return string|null 投票用紙を取得します。
	 */
	public function getBody(): ?string {
		return $this->body;
	}

	/**
	 * 署名対象のデータを設定
	 *
	 * @param string|null $body 投票用紙を取得します。
	 */
	public function setBody(?string $body) {
		$this->body = $body;
	}

	/**
	 * 署名データを取得
	 *
	 * @return string|null 投票用紙を取得します。
	 */
	public function getSignature(): ?string {
		return $this->signature;
	}

	/**
	 * 署名データを設定
	 *
	 * @param string|null $signature 投票用紙を取得します。
	 */
	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}

    public static function fromJson(array $data): GetBallotResult {
        $result = new GetBallotResult();
        $result->setItem(isset($data["item"]) ? Ballot::fromJson($data["item"]) : null);
        $result->setBody(isset($data["body"]) ? $data["body"] : null);
        $result->setSignature(isset($data["signature"]) ? $data["signature"] : null);
        return $result;
    }
}