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

namespace Gs2\Matchmaking\Model;

use Gs2\Core\Model\IModel;

/**
 * 署名済みの投票用紙
 *
 * @author Game Server Services, Inc.
 *
 */
class SignedBallot implements IModel {
	/**
     * @var string 投票用紙の署名対象のデータ
	 */
	protected $body;

	/**
	 * 投票用紙の署名対象のデータを取得
	 *
	 * @return string|null 投票用紙の署名対象のデータ
	 */
	public function getBody(): ?string {
		return $this->body;
	}

	/**
	 * 投票用紙の署名対象のデータを設定
	 *
	 * @param string|null $body 投票用紙の署名対象のデータ
	 */
	public function setBody(?string $body) {
		$this->body = $body;
	}

	/**
	 * 投票用紙の署名対象のデータを設定
	 *
	 * @param string|null $body 投票用紙の署名対象のデータ
	 * @return SignedBallot $this
	 */
	public function withBody(?string $body): SignedBallot {
		$this->body = $body;
		return $this;
	}
	/**
     * @var string 投票用紙の署名
	 */
	protected $signature;

	/**
	 * 投票用紙の署名を取得
	 *
	 * @return string|null 投票用紙の署名
	 */
	public function getSignature(): ?string {
		return $this->signature;
	}

	/**
	 * 投票用紙の署名を設定
	 *
	 * @param string|null $signature 投票用紙の署名
	 */
	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}

	/**
	 * 投票用紙の署名を設定
	 *
	 * @param string|null $signature 投票用紙の署名
	 * @return SignedBallot $this
	 */
	public function withSignature(?string $signature): SignedBallot {
		$this->signature = $signature;
		return $this;
	}

    public function toJson(): array {
        return array(
            "body" => $this->body,
            "signature" => $this->signature,
        );
    }

    public static function fromJson(array $data): SignedBallot {
        $model = new SignedBallot();
        $model->setBody(isset($data["body"]) ? $data["body"] : null);
        $model->setSignature(isset($data["signature"]) ? $data["signature"] : null);
        return $model;
    }
}