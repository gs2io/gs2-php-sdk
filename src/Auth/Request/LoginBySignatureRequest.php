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

class LoginBySignatureRequest extends Gs2BasicRequest {
    /** @var string */
    private $userId;
    /** @var string */
    private $keyId;
    /** @var string */
    private $body;
    /** @var string */
    private $signature;

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): LoginBySignatureRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getKeyId(): ?string {
		return $this->keyId;
	}

	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}

	public function withKeyId(?string $keyId): LoginBySignatureRequest {
		$this->keyId = $keyId;
		return $this;
	}

	public function getBody(): ?string {
		return $this->body;
	}

	public function setBody(?string $body) {
		$this->body = $body;
	}

	public function withBody(?string $body): LoginBySignatureRequest {
		$this->body = $body;
		return $this;
	}

	public function getSignature(): ?string {
		return $this->signature;
	}

	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}

	public function withSignature(?string $signature): LoginBySignatureRequest {
		$this->signature = $signature;
		return $this;
	}

    public static function fromJson(?array $data): ?LoginBySignatureRequest {
        if ($data === null) {
            return null;
        }
        return (new LoginBySignatureRequest())
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withKeyId(empty($data['keyId']) ? null : $data['keyId'])
            ->withBody(empty($data['body']) ? null : $data['body'])
            ->withSignature(empty($data['signature']) ? null : $data['signature']);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "keyId" => $this->getKeyId(),
            "body" => $this->getBody(),
            "signature" => $this->getSignature(),
        );
    }
}