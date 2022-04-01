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

namespace Gs2\Log\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class PutLogRequest extends Gs2BasicRequest {
    /** @var string */
    private $loggingNamespaceId;
    /** @var string */
    private $logCategory;
    /** @var string */
    private $payload;

	public function getLoggingNamespaceId(): ?string {
		return $this->loggingNamespaceId;
	}

	public function setLoggingNamespaceId(?string $loggingNamespaceId) {
		$this->loggingNamespaceId = $loggingNamespaceId;
	}

	public function withLoggingNamespaceId(?string $loggingNamespaceId): PutLogRequest {
		$this->loggingNamespaceId = $loggingNamespaceId;
		return $this;
	}

	public function getLogCategory(): ?string {
		return $this->logCategory;
	}

	public function setLogCategory(?string $logCategory) {
		$this->logCategory = $logCategory;
	}

	public function withLogCategory(?string $logCategory): PutLogRequest {
		$this->logCategory = $logCategory;
		return $this;
	}

	public function getPayload(): ?string {
		return $this->payload;
	}

	public function setPayload(?string $payload) {
		$this->payload = $payload;
	}

	public function withPayload(?string $payload): PutLogRequest {
		$this->payload = $payload;
		return $this;
	}

    public static function fromJson(?array $data): ?PutLogRequest {
        if ($data === null) {
            return null;
        }
        return (new PutLogRequest())
            ->withLoggingNamespaceId(array_key_exists('loggingNamespaceId', $data) && $data['loggingNamespaceId'] !== null ? $data['loggingNamespaceId'] : null)
            ->withLogCategory(array_key_exists('logCategory', $data) && $data['logCategory'] !== null ? $data['logCategory'] : null)
            ->withPayload(array_key_exists('payload', $data) && $data['payload'] !== null ? $data['payload'] : null);
    }

    public function toJson(): array {
        return array(
            "loggingNamespaceId" => $this->getLoggingNamespaceId(),
            "logCategory" => $this->getLogCategory(),
            "payload" => $this->getPayload(),
        );
    }
}