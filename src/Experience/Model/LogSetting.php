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

namespace Gs2\Experience\Model;

use Gs2\Core\Model\IModel;


/**
 * Log Output Setting
 *
 * @see https://docs.gs2.io/api_reference/experience/sdk/#logsetting
 */
class LogSetting implements IModel {
	/**
     * @var string GS2-Log Namespace GRN to output logs
	 */
	private $loggingNamespaceId;
    /** @return string|null GS2-Log Namespace GRN to output logs */
	public function getLoggingNamespaceId(): ?string {
		return $this->loggingNamespaceId;
	}
    /** @param string|null $loggingNamespaceId GS2-Log Namespace GRN to output logs */
	public function setLoggingNamespaceId(?string $loggingNamespaceId) {
		$this->loggingNamespaceId = $loggingNamespaceId;
	}
    /**
     * @param string|null $loggingNamespaceId GS2-Log Namespace GRN to output logs
     * @return LogSetting
     */
	public function withLoggingNamespaceId(?string $loggingNamespaceId): LogSetting {
		$this->loggingNamespaceId = $loggingNamespaceId;
		return $this;
	}

    public static function fromJson(?array $data): ?LogSetting {
        if ($data === null) {
            return null;
        }
        return (new LogSetting())
            ->withLoggingNamespaceId(array_key_exists('loggingNamespaceId', $data) && $data['loggingNamespaceId'] !== null ? $data['loggingNamespaceId'] : null);
    }

    public function toJson(): array {
        return array(
            "loggingNamespaceId" => $this->getLoggingNamespaceId(),
        );
    }
}