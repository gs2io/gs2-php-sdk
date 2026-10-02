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
 * Result of getStatusWithSignatureByUserId: Get Status with signature by User ID
 *
 * @see https://docs.gs2.io/api_reference/experience/sdk/#getstatuswithsignaturebyuserid
 */
class GetStatusWithSignatureByUserIdResult implements IResult {
    /** @var Status Status */
    private $item;
    /** @var string Object to be verified */
    private $body;
    /** @var string signature */
    private $signature;

    /** @return Status|null Status */
	public function getItem(): ?Status {
		return $this->item;
	}

    /** @param Status|null $item Status */
	public function setItem(?Status $item) {
		$this->item = $item;
	}

    /**
     * @param Status|null $item Status
     * @return GetStatusWithSignatureByUserIdResult
     */
	public function withItem(?Status $item): GetStatusWithSignatureByUserIdResult {
		$this->item = $item;
		return $this;
	}

    /** @return string|null Object to be verified */
	public function getBody(): ?string {
		return $this->body;
	}

    /** @param string|null $body Object to be verified */
	public function setBody(?string $body) {
		$this->body = $body;
	}

    /**
     * @param string|null $body Object to be verified
     * @return GetStatusWithSignatureByUserIdResult
     */
	public function withBody(?string $body): GetStatusWithSignatureByUserIdResult {
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
     * @return GetStatusWithSignatureByUserIdResult
     */
	public function withSignature(?string $signature): GetStatusWithSignatureByUserIdResult {
		$this->signature = $signature;
		return $this;
	}

    public static function fromJson(?array $data): ?GetStatusWithSignatureByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new GetStatusWithSignatureByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Status::fromJson($data['item']) : null)
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