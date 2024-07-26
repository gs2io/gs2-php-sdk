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

namespace Gs2\Distributor\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class RunVerifyTaskWithoutNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $verifyTask;
    /** @var string */
    private $keyId;
	public function getVerifyTask(): ?string {
		return $this->verifyTask;
	}
	public function setVerifyTask(?string $verifyTask) {
		$this->verifyTask = $verifyTask;
	}
	public function withVerifyTask(?string $verifyTask): RunVerifyTaskWithoutNamespaceRequest {
		$this->verifyTask = $verifyTask;
		return $this;
	}
	public function getKeyId(): ?string {
		return $this->keyId;
	}
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
	public function withKeyId(?string $keyId): RunVerifyTaskWithoutNamespaceRequest {
		$this->keyId = $keyId;
		return $this;
	}

    public static function fromJson(?array $data): ?RunVerifyTaskWithoutNamespaceRequest {
        if ($data === null) {
            return null;
        }
        return (new RunVerifyTaskWithoutNamespaceRequest())
            ->withVerifyTask(array_key_exists('verifyTask', $data) && $data['verifyTask'] !== null ? $data['verifyTask'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null);
    }

    public function toJson(): array {
        return array(
            "verifyTask" => $this->getVerifyTask(),
            "keyId" => $this->getKeyId(),
        );
    }
}