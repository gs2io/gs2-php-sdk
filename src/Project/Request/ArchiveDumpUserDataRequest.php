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

namespace Gs2\Project\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class ArchiveDumpUserDataRequest extends Gs2BasicRequest {
    /** @var string */
    private $ownerId;
    /** @var string */
    private $transactionId;
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}
	public function withOwnerId(?string $ownerId): ArchiveDumpUserDataRequest {
		$this->ownerId = $ownerId;
		return $this;
	}
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}
	public function withTransactionId(?string $transactionId): ArchiveDumpUserDataRequest {
		$this->transactionId = $transactionId;
		return $this;
	}

    public static function fromJson(?array $data): ?ArchiveDumpUserDataRequest {
        if ($data === null) {
            return null;
        }
        return (new ArchiveDumpUserDataRequest())
            ->withOwnerId(array_key_exists('ownerId', $data) && $data['ownerId'] !== null ? $data['ownerId'] : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null);
    }

    public function toJson(): array {
        return array(
            "ownerId" => $this->getOwnerId(),
            "transactionId" => $this->getTransactionId(),
        );
    }
}