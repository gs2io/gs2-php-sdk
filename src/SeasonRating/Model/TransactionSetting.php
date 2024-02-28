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

namespace Gs2\SeasonRating\Model;

use Gs2\Core\Model\IModel;


class TransactionSetting implements IModel {
	/**
     * @var string
	 */
	private $distributorNamespaceId;
	/**
     * @var string
	 */
	private $queueNamespaceId;
	public function getDistributorNamespaceId(): ?string {
		return $this->distributorNamespaceId;
	}
	public function setDistributorNamespaceId(?string $distributorNamespaceId) {
		$this->distributorNamespaceId = $distributorNamespaceId;
	}
	public function withDistributorNamespaceId(?string $distributorNamespaceId): TransactionSetting {
		$this->distributorNamespaceId = $distributorNamespaceId;
		return $this;
	}
	public function getQueueNamespaceId(): ?string {
		return $this->queueNamespaceId;
	}
	public function setQueueNamespaceId(?string $queueNamespaceId) {
		$this->queueNamespaceId = $queueNamespaceId;
	}
	public function withQueueNamespaceId(?string $queueNamespaceId): TransactionSetting {
		$this->queueNamespaceId = $queueNamespaceId;
		return $this;
	}

    public static function fromJson(?array $data): ?TransactionSetting {
        if ($data === null) {
            return null;
        }
        return (new TransactionSetting())
            ->withDistributorNamespaceId(array_key_exists('distributorNamespaceId', $data) && $data['distributorNamespaceId'] !== null ? $data['distributorNamespaceId'] : null)
            ->withQueueNamespaceId(array_key_exists('queueNamespaceId', $data) && $data['queueNamespaceId'] !== null ? $data['queueNamespaceId'] : null);
    }

    public function toJson(): array {
        return array(
            "distributorNamespaceId" => $this->getDistributorNamespaceId(),
            "queueNamespaceId" => $this->getQueueNamespaceId(),
        );
    }
}