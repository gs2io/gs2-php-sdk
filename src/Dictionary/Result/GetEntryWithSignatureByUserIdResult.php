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
 * Result of getEntryWithSignatureByUserId: Get Entry with cryptographic signature by User ID
 *
 * @see https://docs.gs2.io/api_reference/dictionary/sdk/#getentrywithsignaturebyuserid
 */
class GetEntryWithSignatureByUserIdResult implements IResult {
    /** @var Entry Entry */
    private $item;
    /** @var string Entry information for signature subject */
    private $body;
    /** @var string signature */
    private $signature;

    /** @return Entry|null Entry */
	public function getItem(): ?Entry {
		return $this->item;
	}

    /** @param Entry|null $item Entry */
	public function setItem(?Entry $item) {
		$this->item = $item;
	}

    /**
     * @param Entry|null $item Entry
     * @return GetEntryWithSignatureByUserIdResult
     */
	public function withItem(?Entry $item): GetEntryWithSignatureByUserIdResult {
		$this->item = $item;
		return $this;
	}

    /** @return string|null Entry information for signature subject */
	public function getBody(): ?string {
		return $this->body;
	}

    /** @param string|null $body Entry information for signature subject */
	public function setBody(?string $body) {
		$this->body = $body;
	}

    /**
     * @param string|null $body Entry information for signature subject
     * @return GetEntryWithSignatureByUserIdResult
     */
	public function withBody(?string $body): GetEntryWithSignatureByUserIdResult {
		$this->body = $body;
		return $this;
	}

    /** @return string|null signature */
	public function getSignature(): ?string {
		return $this->signature;
	}

    /** @param string|null $signature signature */
	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}

    /**
     * @param string|null $signature signature
     * @return GetEntryWithSignatureByUserIdResult
     */
	public function withSignature(?string $signature): GetEntryWithSignatureByUserIdResult {
		$this->signature = $signature;
		return $this;
	}

    public static function fromJson(?array $data): ?GetEntryWithSignatureByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new GetEntryWithSignatureByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Entry::fromJson($data['item']) : null)
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