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

namespace Gs2\Stamina\Model;

use Gs2\Core\Model\IModel;


class TransactionSettingV2 implements IModel {
	/**
     * @var string
	 */
	private $distributorNamespaceId;
	/**
     * @var bool
	 */
	private $enableParallelExecution;
	public function getDistributorNamespaceId(): ?string {
		return $this->distributorNamespaceId;
	}
	public function setDistributorNamespaceId(?string $distributorNamespaceId) {
		$this->distributorNamespaceId = $distributorNamespaceId;
	}
	public function withDistributorNamespaceId(?string $distributorNamespaceId): TransactionSettingV2 {
		$this->distributorNamespaceId = $distributorNamespaceId;
		return $this;
	}
	public function getEnableParallelExecution(): ?bool {
		return $this->enableParallelExecution;
	}
	public function setEnableParallelExecution(?bool $enableParallelExecution) {
		$this->enableParallelExecution = $enableParallelExecution;
	}
	public function withEnableParallelExecution(?bool $enableParallelExecution): TransactionSettingV2 {
		$this->enableParallelExecution = $enableParallelExecution;
		return $this;
	}

    public static function fromJson(?array $data): ?TransactionSettingV2 {
        if ($data === null) {
            return null;
        }
        return (new TransactionSettingV2())
            ->withDistributorNamespaceId(array_key_exists('distributorNamespaceId', $data) && $data['distributorNamespaceId'] !== null ? $data['distributorNamespaceId'] : null)
            ->withEnableParallelExecution(array_key_exists('enableParallelExecution', $data) ? $data['enableParallelExecution'] : null);
    }

    public function toJson(): array {
        return array(
            "distributorNamespaceId" => $this->getDistributorNamespaceId(),
            "enableParallelExecution" => $this->getEnableParallelExecution(),
        );
    }
}