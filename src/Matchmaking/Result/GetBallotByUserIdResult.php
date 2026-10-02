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
 * Result of getBallotByUserId: Create ballot with signatures, specifying user ID
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#getballotbyuserid
 */
class GetBallotByUserIdResult implements IResult {
    /** @var Ballot Ballot */
    private $item;
    /** @var string Data to be signed */
    private $body;
    /** @var string Signature */
    private $signature;

    /** @return Ballot|null Ballot */
	public function getItem(): ?Ballot {
		return $this->item;
	}

    /** @param Ballot|null $item Ballot */
	public function setItem(?Ballot $item) {
		$this->item = $item;
	}

    /**
     * @param Ballot|null $item Ballot
     * @return GetBallotByUserIdResult
     */
	public function withItem(?Ballot $item): GetBallotByUserIdResult {
		$this->item = $item;
		return $this;
	}

    /** @return string|null Data to be signed */
	public function getBody(): ?string {
		return $this->body;
	}

    /** @param string|null $body Data to be signed */
	public function setBody(?string $body) {
		$this->body = $body;
	}

    /**
     * @param string|null $body Data to be signed
     * @return GetBallotByUserIdResult
     */
	public function withBody(?string $body): GetBallotByUserIdResult {
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
     * @return GetBallotByUserIdResult
     */
	public function withSignature(?string $signature): GetBallotByUserIdResult {
		$this->signature = $signature;
		return $this;
	}

    public static function fromJson(?array $data): ?GetBallotByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new GetBallotByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Ballot::fromJson($data['item']) : null)
            ->withBody(array_key_exists('body', $data) && $data['body'] !== null ? $data['body'] : null)
            ->withSignature(array_key_exists('signature', $data) && $data['signature'] !== null ? $data['signature'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "body" => $this->getBody(),
            "signature" => $this->getSignature(),
        );
    }
}