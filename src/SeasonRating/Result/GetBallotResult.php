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

namespace Gs2\SeasonRating\Result;

use Gs2\Core\Model\IResult;
use Gs2\SeasonRating\Model\Ballot;

/**
 * Result of getBallot: Prepared ballot along with signatures
 *
 * @see https://docs.gs2.io/api_reference/season_rating/sdk/#getballot
 */
class GetBallotResult implements IResult {
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
     * @return GetBallotResult
     */
	public function withItem(?Ballot $item): GetBallotResult {
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
     * @return GetBallotResult
     */
	public function withBody(?string $body): GetBallotResult {
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
     * @return GetBallotResult
     */
	public function withSignature(?string $signature): GetBallotResult {
		$this->signature = $signature;
		return $this;
	}

    public static function fromJson(?array $data): ?GetBallotResult {
        if ($data === null) {
            return null;
        }
        return (new GetBallotResult())
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