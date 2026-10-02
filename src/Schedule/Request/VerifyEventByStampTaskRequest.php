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

namespace Gs2\Schedule\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for verifyEventByStampTask: Execute verification of whether it is the event period as a verify action
 *
 * @see https://docs.gs2.io/api_reference/schedule/stamp_sheet/#gs2scheduleverifyeventbyuserid
 */
class VerifyEventByStampTaskRequest extends Gs2BasicRequest {
    /** @var string Verify Action */
    private $stampTask;
    /** @var string Encryption Key GRN */
    private $keyId;
    /** @return string|null Verify Action */
	public function getStampTask(): ?string {
		return $this->stampTask;
	}
    /** @param string|null $stampTask Verify Action */
	public function setStampTask(?string $stampTask) {
		$this->stampTask = $stampTask;
	}
    /**
     * @param string|null $stampTask Verify Action
     * @return VerifyEventByStampTaskRequest
     */
	public function withStampTask(?string $stampTask): VerifyEventByStampTaskRequest {
		$this->stampTask = $stampTask;
		return $this;
	}
    /** @return string|null Encryption Key GRN */
	public function getKeyId(): ?string {
		return $this->keyId;
	}
    /** @param string|null $keyId Encryption Key GRN */
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
    /**
     * @param string|null $keyId Encryption Key GRN
     * @return VerifyEventByStampTaskRequest
     */
	public function withKeyId(?string $keyId): VerifyEventByStampTaskRequest {
		$this->keyId = $keyId;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyEventByStampTaskRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyEventByStampTaskRequest())
            ->withStampTask(array_key_exists('stampTask', $data) && $data['stampTask'] !== null ? $data['stampTask'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null);
    }

    public function toJson(): array {
        return array(
            "stampTask" => $this->getStampTask(),
            "keyId" => $this->getKeyId(),
        );
    }
}