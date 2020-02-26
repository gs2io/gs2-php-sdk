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

namespace Gs2\Distributor\Model;

use Gs2\Core\Model\IModel;

/**
 * ロギング通知設定
 *
 * @author Game Server Services, Inc.
 *
 */
class LogSetting implements IModel {
	/**
     * @var string ログの記録に使用する GS2-Log のネームスペース のGRN
	 */
	protected $loggingNamespaceId;

	/**
	 * ログの記録に使用する GS2-Log のネームスペース のGRNを取得
	 *
	 * @return string|null ログの記録に使用する GS2-Log のネームスペース のGRN
	 */
	public function getLoggingNamespaceId(): ?string {
		return $this->loggingNamespaceId;
	}

	/**
	 * ログの記録に使用する GS2-Log のネームスペース のGRNを設定
	 *
	 * @param string|null $loggingNamespaceId ログの記録に使用する GS2-Log のネームスペース のGRN
	 */
	public function setLoggingNamespaceId(?string $loggingNamespaceId) {
		$this->loggingNamespaceId = $loggingNamespaceId;
	}

	/**
	 * ログの記録に使用する GS2-Log のネームスペース のGRNを設定
	 *
	 * @param string|null $loggingNamespaceId ログの記録に使用する GS2-Log のネームスペース のGRN
	 * @return LogSetting $this
	 */
	public function withLoggingNamespaceId(?string $loggingNamespaceId): LogSetting {
		$this->loggingNamespaceId = $loggingNamespaceId;
		return $this;
	}

    public function toJson(): array {
        return array(
            "loggingNamespaceId" => $this->loggingNamespaceId,
        );
    }

    public static function fromJson(array $data): LogSetting {
        $model = new LogSetting();
        $model->setLoggingNamespaceId(isset($data["loggingNamespaceId"]) ? $data["loggingNamespaceId"] : null);
        return $model;
    }
}