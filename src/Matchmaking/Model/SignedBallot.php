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
 * Signed Ballot
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#signedballot
 */
class SignedBallot implements IModel {
	/**
     * @var string Ballot Body
	 */
	private $body;
	/**
     * @var string Signature
	 */
	private $signature;
    /** @return string|null Ballot Body */
	public function getBody(): ?string {
		return $this->body;
	}
    /** @param string|null $body Ballot Body */
	public function setBody(?string $body) {
		$this->body = $body;
	}
    /**
     * @param string|null $body Ballot Body
     * @return SignedBallot
     */
	public function withBody(?string $body): SignedBallot {
		$this->body = $body;
		return $this;
	}
    /** @return string|null Signature */
	public function getSignature(): ?string {
		return $this->signature;
	}
    /** @param string|null $signature Signature */
	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}
    /**
     * @param string|null $signature Signature
     * @return SignedBallot
     */
	public function withSignature(?string $signature): SignedBallot {
		$this->signature = $signature;
		return $this;
	}

    public static function fromJson(?array $data): ?SignedBallot {
        if ($data === null) {
            return null;
        }
        return (new SignedBallot())
            ->withBody(array_key_exists('body', $data) && $data['body'] !== null ? $data['body'] : null)
            ->withSignature(array_key_exists('signature', $data) && $data['signature'] !== null ? $data['signature'] : null);
    }

    public function toJson(): array {
        return array(
            "body" => $this->getBody(),
            "signature" => $this->getSignature(),
        );
    }
}