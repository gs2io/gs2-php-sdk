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

namespace Gs2\Money\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class RecordReceiptRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $contentsId;
    /** @var string */
    private $receipt;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): RecordReceiptRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): RecordReceiptRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getContentsId(): ?string {
		return $this->contentsId;
	}

	public function setContentsId(?string $contentsId) {
		$this->contentsId = $contentsId;
	}

	public function withContentsId(?string $contentsId): RecordReceiptRequest {
		$this->contentsId = $contentsId;
		return $this;
	}

	public function getReceipt(): ?string {
		return $this->receipt;
	}

	public function setReceipt(?string $receipt) {
		$this->receipt = $receipt;
	}

	public function withReceipt(?string $receipt): RecordReceiptRequest {
		$this->receipt = $receipt;
		return $this;
	}

    public static function fromJson(?array $data): ?RecordReceiptRequest {
        if ($data === null) {
            return null;
        }
        return (new RecordReceiptRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withContentsId(empty($data['contentsId']) ? null : $data['contentsId'])
            ->withReceipt(empty($data['receipt']) ? null : $data['receipt']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "contentsId" => $this->getContentsId(),
            "receipt" => $this->getReceipt(),
        );
    }
}