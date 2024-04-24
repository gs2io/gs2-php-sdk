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

namespace Gs2\Auth\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class FederationRequest extends Gs2BasicRequest {
    /** @var string */
    private $originalUserId;
    /** @var string */
    private $userId;
    /** @var string */
    private $policyDocument;
    /** @var int */
    private $timeOffset;
    /** @var string */
    private $timeOffsetToken;
	public function getOriginalUserId(): ?string {
		return $this->originalUserId;
	}
	public function setOriginalUserId(?string $originalUserId) {
		$this->originalUserId = $originalUserId;
	}
	public function withOriginalUserId(?string $originalUserId): FederationRequest {
		$this->originalUserId = $originalUserId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): FederationRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getPolicyDocument(): ?string {
		return $this->policyDocument;
	}
	public function setPolicyDocument(?string $policyDocument) {
		$this->policyDocument = $policyDocument;
	}
	public function withPolicyDocument(?string $policyDocument): FederationRequest {
		$this->policyDocument = $policyDocument;
		return $this;
	}
	public function getTimeOffset(): ?int {
		return $this->timeOffset;
	}
	public function setTimeOffset(?int $timeOffset) {
		$this->timeOffset = $timeOffset;
	}
	public function withTimeOffset(?int $timeOffset): FederationRequest {
		$this->timeOffset = $timeOffset;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
	public function withTimeOffsetToken(?string $timeOffsetToken): FederationRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?FederationRequest {
        if ($data === null) {
            return null;
        }
        return (new FederationRequest())
            ->withOriginalUserId(array_key_exists('originalUserId', $data) && $data['originalUserId'] !== null ? $data['originalUserId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withPolicyDocument(array_key_exists('policyDocument', $data) && $data['policyDocument'] !== null ? $data['policyDocument'] : null)
            ->withTimeOffset(array_key_exists('timeOffset', $data) && $data['timeOffset'] !== null ? $data['timeOffset'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "originalUserId" => $this->getOriginalUserId(),
            "userId" => $this->getUserId(),
            "policyDocument" => $this->getPolicyDocument(),
            "timeOffset" => $this->getTimeOffset(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}